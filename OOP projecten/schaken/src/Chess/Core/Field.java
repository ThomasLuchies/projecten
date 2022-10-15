package Chess.Core;

import Chess.Core.Pieces.Piece;

/**
 * Represents a field on the board.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public class Field
{
    public static class NoPieceAvailable extends Exception
    {
        public NoPieceAvailable()
        {
            super("No piece available.");
        }
    }

    private final Coords coords;
    private Piece piece;

    public Field(Coords coords)
    {
        this.coords = coords;
        this.piece = null;
    }

    public Field(Coords coords, Piece piece)
    {
        this.coords = coords;
        this.piece = piece;
    }

    public Coords getCoords()
    {
        return coords;
    }

    /**
     * Returns the piece placed on this field.
     *
     * @return The piece placed on the field.
     * @throws NoPieceAvailable Throws when no piece exists on the field or the game has a certain state.
     */
    public Piece getPiece() throws NoPieceAvailable
    {
        if (piece == null)
            throw new NoPieceAvailable();
        return piece;
    }

    /**
     * Places the given piece or overrides the existing piece placed on this field.
     *
     * @param piece The piece to be places on the board
     */
    public void setPiece(Piece piece)
    {
        this.piece = piece;
    }

    /**
     * Removes the piece placed on the field.
     */
    public void removePiece()
    {
        piece = null;
    }

    /**
     * Returns true if the field has a piece on it.
     */
    public boolean pieceOnField()
    {
        return piece != null;
    }
}