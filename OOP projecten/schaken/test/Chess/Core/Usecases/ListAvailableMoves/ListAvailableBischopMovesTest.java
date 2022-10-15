package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Bischop;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Pieces.Rook;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class ListAvailableBischopMovesTest
{
    private ListAvailableMoves usecase;

    @BeforeEach
    void setup()
    {
        usecase = new ListAvailableBischopMoves();
    }

    @Test
    void canReturnHashsetWith1DirectionMovesWithoutBlockingPieces() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(1, 1);
        Bischop bischop = new Bischop(Color.black, board);

        board.setPiece(coords, bischop);
        assertEquals(usecase.list(board, coords).size(), 7);
    }

    @Test
    void canReturnHashsetWith1DirectionMovesWithBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(1, 1);
        Bischop bischop = new Bischop(Color.black, board);
        Pawn pawn = new Pawn(Color.black, board);

        board.setPiece(coords, bischop);
        board.setPiece(new Coords(4,4), pawn);
        assertEquals(usecase.list(board, coords).size(), 2);
    }

    @Test
    void canReturnHashsetWith1DirectionMovesWithBlockingPiecesFromOtherColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(1, 1);
        Bischop bischop = new Bischop(Color.black, board);
        Pawn pawn = new Pawn(Color.black, board);

        board.setPiece(coords, bischop);
        board.setPiece(new Coords(4,4), pawn);
        assertEquals(usecase.list(board, coords).size(), 2);
    }

    @Test
    void canReturnHashsetWithMultipleDirectionMovesWithoutBlockingPieces() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Bischop bischop = new Bischop(Color.black, board);

        board.setPiece(coords, bischop);
        assertEquals(usecase.list(board, coords).size(), 11);
    }

    @Test
    void canReturnHashsetWithMultipleDirectionMovesWithBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Bischop bischop = new Bischop(Color.black, board);
        Pawn pawn = new Pawn(Color.black, board);
        Rook rook = new Rook(Color.black, board);

        board.setPiece(coords, bischop);
        board.setPiece(new Coords(5, 4), pawn);
        board.setPiece(new Coords(4, 7), rook);
        assertEquals(usecase.list(board, coords).size(), 5);
    }
}
