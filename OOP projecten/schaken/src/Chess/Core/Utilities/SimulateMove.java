package Chess.Core.Utilities;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;

public class SimulateMove
{
    public Board simulate(Board board, Coords location, Coords destination) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var simulationBoard = new Board();
        for (var field : board.getFields())
            if (field.pieceOnField())
                simulationBoard.setPiece(field.getCoords(), field.getPiece());
        if (!simulationBoard.pieceOnField(location))
            return simulationBoard;
        var piece = simulationBoard.getPiece(location);
        simulationBoard.setPiece(destination, piece);
        simulationBoard.removePiece(location);
        return simulationBoard;
    }
}