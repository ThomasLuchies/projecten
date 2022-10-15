package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Bischop;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Pieces.Queen;
import Chess.Core.Pieces.Rook;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class ListAvailableRookMovesTest
{
    private ListAvailableMoves usecase;

    @BeforeEach
    void setup()
    {
        usecase = new ListAvailableRookMoves();
    }

    @Test
    void canReturnHashsetWithMultipleDirectionsMovesWithoutBlockingPieces() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 5);
        Rook rook = new Rook(Color.black, board);

        board.setPiece(coords, rook);
        assertEquals(usecase.list(board, coords).size(), 14);
    }

    @Test
    void canReturnHashsetWithMultipleDirectionsMovesWithBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Rook rook = new Rook(Color.black, board);
        Pawn pawn = new Pawn(Color.black, board);

        board.setPiece(coords, rook);
        board.setPiece(new Coords(3,2), pawn);
        assertEquals(usecase.list(board, coords).size(), 12);
    }

    @Test
    void canReturnHashsetWithtMultipleDirectionsMovesWithBlockingPiecesFromOtherColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Rook rook = new Rook(Color.black, board);
        Pawn pawn = new Pawn(Color.white, board);

        board.setPiece(coords, rook);
        board.setPiece(new Coords(5,6), pawn);
        assertEquals(usecase.list(board, coords).size(), 11);
    }

    @Test
    void canReturnHashsetWith1DirectionFreeWithBlockingPieceFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Pawn pawn = new Pawn(Color.black, board);
        Bischop bischop = new Bischop(Color.black, board);
        Rook rook = new Rook(Color.black, board);
        Queen queen = new Queen(Color.black, board);

        board.setPiece(coords, rook);
        board.setPiece(new Coords(3, 7), pawn);
        board.setPiece(new Coords(4, 6), bischop);
        board.setPiece(new Coords(2, 6), queen);
        assertEquals(usecase.list(board, coords).size(), 5);
    }

    @Test
    void canReturnHashsetWithMultipleDirectionMovesWithMultipleBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Pawn pawn = new Pawn(Color.white, board);
        Bischop bischop = new Bischop(Color.white, board);
        Rook rook = new Rook(Color.black, board);
        Queen queen = new Queen(Color.white, board);

        board.setPiece(coords, rook);
        board.setPiece(new Coords(3, 7), pawn);
        board.setPiece(new Coords(4, 6), bischop);
        board.setPiece(new Coords(2, 6), queen);
        assertEquals(usecase.list(board, coords).size(), 8);
    }
}
